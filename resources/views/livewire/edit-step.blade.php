<div>
    <div class="row">
        <div class="col-6"><h2>Add Steps to Describe Task</h2></div>
        <div class="col-6"><span wire:click="increament" class="fa fa-plus btn text-primary"></span></div>
    </div>
    

    @foreach($steps as $step) 
    <div class="form-row" wire:key={{$loop->index}}>

        <div class="col-11">
            <input class="form-control" type="text" placeholder="{{'Step-'.($loop->index+1)}}" name="stepName[]" value="{{$step['name']}}" id="">
            <input class="form-control" type="hidden" name="stepId[]" value="{{$step['id']}}" >
            
        </div>
        
        <div class="col-1">
        <span wire:click="remove({{$loop->index}})" class="fa fa-times text-danger btn fa-2x btn p-3" ></span>
        </div>
    </div>

@endforeach



</div>