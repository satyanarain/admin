<div id="load" style="position: relative;">
    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="display_none"></th>
                            <th>@lang('Depot Name')</th>
                            <th>@lang('Crew Name')</th>
                            <th>@lang('Crew ID')</th>
                            <th>@lang('Role')</th>
                           
                             {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>

   
                      <tbody class="articles">
                       
                        @foreach($users as $value)
                        <tr class="nor_f">
                            <th class="display_none"></th>
                            <td>{{$value->taxon_id}}</td>
                            <td>{{$value->selectioncriteria}}</td>
                            <td>{{$value->specie_id}}</td>
                            <td>{{$value->specie_data}}</td>
                            {{ actionEdit('edit',$value->id)}}
                         </tr>
                      
                        @endforeach
                        </tbody>
                     
</table>

</div>
