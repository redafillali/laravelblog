<div>
    @if(Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @elseif(Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateUser()" method="post">
                <div class="form-group mb-3 ">
                    <label class="form-label">{{__('Name')}}</label>
                    <div>
                        <input type="text" class="form-control" wire:model="name" value="{{$user['name']}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">{{__('Picture')}}</label>
                    <div>
                        <input type="file" class="form-control" wire:model="picture">
                        <div wire:loading wire:target="picture">{{__('Uploading')}}...</div>

                        @if(!empty($picture))
                        @if(strpos($picture, '/temp/') === false)
                        <img class="col-sm-2 my-2" wire:loading.remove src="{{$picture}}" alt="{{$name}}"
                            class="img-thumbnail">
                        @else
                        <img class="col-sm-2 my-2" wire:loading.remove src="{{ $picture->temporaryUrl() }}"
                            class="img-thumbnail">
                        @endif
                        @endif
                        @error('picture')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">{{__('Email address')}}</label>
                    <div>
                        <input type="email" class="form-control" aria-describedby="emailHelp"
                            placeholder="{{__('Enter email')}}"
                            style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"
                            autocomplete="off" wire:model="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">{{__('Role')}}</label>
                    <div>
                        <select class="form-select" wire:model="type_id">
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                        wire:target="picture">{{__('Update')}}</button>
                </div>
                <div wire:loading.block wire:target="updateUser" class="text-warning">
                    {{__('Updating')}}...
                </div>
            </form>
        </div>
    </div>
</div>
