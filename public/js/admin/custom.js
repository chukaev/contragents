$(document).ready(function () {
    $('body').on('click', 'ul.pagination li a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        getPaginatedData(url);
        window.history.pushState("", "", url);
    });

    function getPaginatedData(url) {
        var csrftoken = $('meta[name=csrf-token]').attr('content');
        $.ajaxSetup({
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-CSRF-TOKEN", csrftoken)
                }
            }
        });

        $.ajax({
            method: "POST",
            type: "POST",
            url: url
        }).done(function (data) {

            $('.table-rows').html(data);
        }).fail(function () {
            alert('Не удалось загрузить данные, попробуйте позже.');
        });
    }

    $(".filter").keyup(throttle(function () {
        var filters = collectFilters ();

        if ($(this).hasClass('date-range')) {
            if (!isCorrectDateRange($(this).val())) {
                return;
            }
        }

        filterRows(filters);
    }));

    $("select.filter").change(throttle(function () {
        var filters = collectFilters ();

        filterRows(filters);
    }));

    $(".sortable-column").click(throttle(function () {
        var column = $(this).attr('data-name');
        var direction;
        var filters = collectFilters ();
        var iconClass = '';

        if ($(this).children()[0].classList.contains("fa-sort")) {
            direction = 'DESC';
            iconClass = 'fa fa-fw fa-sort-amount-desc';
        } else if ($(this).children()[0].classList.contains("fa-sort-amount-desc")) {
            direction = 'ASC';
            iconClass = 'fa fa-fw fa-sort-amount-asc';
        } else if ($(this).children()[0].classList.contains("fa-sort-amount-asc")) {
            direction = 'none';
            iconClass = 'fa fa-fw fa-sort';
        }

        var sortedColumn = this;//document.querySelector('[data-name="name"]');

        /* Set default class to sorting columns. */
        resetSortingColumns();

        sortedColumn.children[0].className = iconClass;

        sortRows(column, direction, filters);
    }));

    // Ajax to filter data.
    function filterRows(filters) {
        var csrftoken = $('meta[name=csrf-token]').attr('content');

        $.ajaxSetup({
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-CSRF-TOKEN", csrftoken)
                }
            }
        });

        /* Remove page parameter from url, when filtering data. */
        resetPageParameter ();

        $.ajax({
            method: "POST",
            type: "POST",
            data: {
                filters_array: JSON.stringify(filters),
                page: 1 // reseting pagination links
            }
        }).done(function (data) {
            $('.table-rows').html(data);
        }).fail(function () {
            alert('Не удалось загрузить данные, попробуйте позже.');
        });
    }

    // Ajax to sort data.
    function sortRows(column, direction, filters) {
        var csrftoken = $('meta[name=csrf-token]').attr('content');

        $.ajaxSetup({
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-CSRF-TOKEN", csrftoken)
                }
            }
        });

        /* Get page from url. */
        var page = getPage();

        $.ajax({
            method: "POST",
            type: "POST",
            data: {
                sort_column: column,
                sort_direction: direction,
                filters_array: JSON.stringify(filters),
                page: page // stay on the current page, when sorting
            }
        }).done(function (data) {
            $('.table-rows').html(data);
        }).fail(function () {
            alert('Не удалось отсортировать данные, попробуйте позже.');
        });
    }

    // Collect all active filter.
    function collectFilters() {
        var filters = {};
        $(".filter").each(function () {
            filters[$(this).attr("id")] = $(this).val();
        });

        return filters;
    }

    // Deactivate all sorting columns.
    function resetSortingColumns() {
        $(".sortable-column").each(function () {
            $(this).children()[0].className = "fa fa-fw fa-sort";
        });
    }

    /**
     * Retrieve GET parameter 'page' from url.
     */
    function getPage() {
        var urlString = window.location.href;
        var url = new URL(urlString);
        var page = url.searchParams.get("page");

        return page;
    }

    /**
     * Delay after last key up event
     * @param f
     * @param delay
     * @returns {Function}
     */
    function throttle(f, delay) {
        var timer = null;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = window.setTimeout(function () {
                    f.apply(context, args);
                },
                delay || 150);
        };
    }
})
