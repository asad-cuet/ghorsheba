                                    <div class="form-group row">
                                        <label for="{{$label}}"
                                            class="col-md-4 col-form-label text-md-right">{{$text}}</label>
                                        <div class="col-md-6">
                                            <input id="{{$id}}" type="{{$type}}" class="form-control" name="{{$name}}" value="{{$value}}" required="" autofocus="">
                                            <span class="text-danger">
                                                   @error('{{$name}}')
                                                       {{$message}}
                                                   @enderror
                                            </span>
                                        </div>
                                    </div>