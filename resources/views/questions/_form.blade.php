                        <div class="form-group">
                                <lable for="question-title"> Question Title</label>
                                <input type="text" value="{{ old('title',$question->title) }}" name="title" id="question-title" class="form-control {{ $errors->has('title') ? 'is-valid' : ''}}">
                                @if( $errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title' )}}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                                <lable for="question-body"> Explain Your Question</label>
                                <textarea   name="body" id="question-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-valid' : ''}}">{{ old('body',$question->body) }}</textarea>
                                @if( $errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title' )}}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">{{$buttonText}}</button>
                        </div >
                        <div class="form-group">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>