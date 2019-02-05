<?php

namespace App\Services\Queries\Traits;

trait Filters
{
    private $filters;

    /**
     * Add conditions to query
     *
     * @param $query
     * @param $filters
     */
    public function filter($query, $request)
    {
        if (!isset($request))
            return;

        $this->filters = $request->input('filters_array');
        $this->filters = json_decode($this->filters, true);

        $this->parseDateRange(['created_at', 'updated_at']);

        if (isset($this->filters))
            foreach ($this->filters as $key => $value) {
                if (isset($this->filters[$key]) && $this->filters[$key] != "") {
                    if ($key == "parents") {
                        $query->where('oil', '>=', $value);
                    } else if ($key == "created_at") {
                        $query->whereBetween('created_at', $value);
                    } else if ($key == "updated_at") {
                        $query->whereBetween('updated_at', $value);
                    } else if ($key == "status") {
                        if ($value != "all")
                            $query->where('status', '=', $value);
                    } else if ($key == "date_min") {
                        $query->where('date', '>=', $value);
                    } else {
                        $query->where($key, 'like', '%' . $value . '%');
                    }
                }
            }
    }

    /**
     * Parse dateRangePicker dates.
     *
     * @param $dates
     */
    public function parseDateRange($keys)
    {
        foreach ($keys as $key) {
            if (isset($this->filters[$key]) && $this->filters[$key] != "") {
                list($minDate, $separator, $maxDate) = explode(' ', $this->filters[$key]);

                $this->filters[$key] = [$minDate, $maxDate];
            }
        }
    }
}