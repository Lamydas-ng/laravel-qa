@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                     <h2> All Questions </h2>
                     <div class="ml-auto"></div>
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                    </div>
                </div>

                <div class="card-body">
                   <form action ="{{ route('questions.store') }}" method ="post">
                       
                        <div class="form-group">
                                <lable for="question-title"> Question Title</label>
                                <input type="text" name="title" id="question-title" class="form-control {{ $errors->has('title') ? 'is-valid' : ''}}">
                                @if( $errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->firs('title' )}}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                                <lable for="question-body"> Explain Your Question</label>
                                <textarea   name="body" id="question-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-valid' : ''}}"></textarea>
                                @if( $errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->firs('title' )}}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Ask this question</button>
                        </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
