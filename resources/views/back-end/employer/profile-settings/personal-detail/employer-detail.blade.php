<div class="wt-tabcompanyinfo wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.company_details') }}}</h2>
    </div>
    <div class="wt-accordiondetails">
        <div class="wt-radioboxholder">
            <div class="wt-title">
                <h4>{{{ trans('lang.no_of_employees') }}}</h4>
            </div>
            @foreach ($employees as $key => $employee)
                <span class="wt-radio">
                        <input id="wt-just-{{{$key}}}" type="radio" name="employees" value="{{{$employee['value']}}}" 
                        {{($employee['value'] == $no_of_employees) ? 'checked' : ''}} >
                        <label for="wt-just-{{{$key}}}">{{{$employee['title']}}}</label>
                </span> 
            @endforeach
        </div>
        @if ($departments->count() > 0)
            <div class="wt-radioboxholder">
                <div class="wt-title">
                    <h4>{{{ trans('lang.your_department') }}}</h4>
                </div>
                @foreach ($departments as $key => $department)
                    <span class="wt-radio">
                        <input id="wt-department-{{{$department->id}}}" type="radio" name="department" value="{{{$department->id}}}" 
                        {{($department->id == $department_id) ? 'checked' : ''}}>
                        <label for="wt-department-{{{$department->id}}}">{{{$department->title}}}</label>
                    </span>                                                        
                @endforeach
            </div>
        @endif  
    </div>
</div>