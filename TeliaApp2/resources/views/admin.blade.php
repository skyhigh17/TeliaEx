<!--haldusleht-->

@include('app.header')

<html>
    <form method="POST" action="{{route('admin.store')}}">
        @csrf

        <div class="card">
            <div class="form-group">
                    <label for="ekraan_nimi">Nimeta Ekraan:</label><input class="form-control" id="ekraan_nimi" name="nimi" >
            </div>
            <div class="form-group">
                <label for="ekraan_nimi">Nimeta lingi nimi:</label><input class="form-control" id="ekraan_url" name="url" >
            </div>
            <div>
                <label  for="vali-vaated">Vali vaated:</label><select multiple="" class="form-control small" id="vali-vaated" name="vaade[]" >
                    <option value="1">Vaade 1</option>
                    <option value="2">Vaade 2</option>
                    <option value="3">Vaade 3</option>
                </select>
            </div>
            <div>
                <label  for="vali-vaated">Vali ekraani keel:</label><select class="form-control small" id="vali-keel" name="keel" >
                    <option></option>
                    <option>EST</option>
                    <option>RUS</option>
                    <option>ENG</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Ekraan_submit" value="Save"></input>
        </div>
    </form>

    @if(!empty($ekraan['ekraan_data']))
    <form method="POST" action="{{route('admin.store')}}">
    @csrf
    <table class="table table-striped table-dark">
        
        <thead >
            <tr>
                <th>Ekraani nimi</th>
                <th>Keel</th>
                <th>Lisatud vaated</th>
                <th>Vaate lisad</th>
                <th>Ekraani url</th>
            </tr>
        </thead>
        <tbody>
 
            @foreach ($ekraan['ekraan_data'] as $row)
            <tr>
                <td>{{$row['name']}}</td>
                <td>
                <select class="form-select" name="ekraan_language_selector[]">
                    <option {{ ($row['language'] == "EST")? "selected" : "" }} value="EST">EST</option>
                    <option {{ ($row['language'] == "ENG")? "selected" : "" }} value="ENG">ENG</option>
                    <option {{ ($row['language'] == "RUS")? "selected" : "" }} value="RUS">RUS</option>
                </select></td>
                <td>
                @if(!empty($row['vaade']))
                <select class="form-select" name="aktiivne_selector[]">
                   
                    @foreach($row['vaade'] as $row_vaade)
      
                        <option value="{{$row_vaade->id}}" {{ ($row['active_vaade_id'] == $row_vaade->id)? "selected" : "" }} >{{$row_vaade->Name}}</option>

                    @endforeach
                </select> 

                @endif
                
                <input type="hidden" name="ekraan_id[]" value="{{$row['id']}}"></input>    
                </td>
                <td>
                    @foreach($row['vaade'] as $row_vaade)        
                        @if($row['active_vaade_id'] == 3 && $row['active_vaade_id'] == $row_vaade->id)
                            Vali kuupäev:
                            <input class="form-control" type="date" value="{{$row_vaade->kuupaev}}" name="kuupaev[]"></input>
                        @endif
                    @endforeach
                    @if($row['active_vaade_id'] != 3)
                    <!-- tegelt ei ole vaja sest siin ainult üks vaade, mida muuta vaja, aga vahet ei ole-->
                        <input class="form-control" type="hidden" value="" name="kuupaev[]"></input>
                    @endif   
                </td>
                <td>
                    {{$row['url']}}
                </td>
            </tr>
            @endforeach
        </tbody>
    <table>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="Ekraan_submit" value="Update"></input>
    </div>
    </form>
    @endif
</html>