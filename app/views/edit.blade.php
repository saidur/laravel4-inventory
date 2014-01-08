@extends('layouts')

@section('content')
    <div class="page-header">
        <h1>Edit Game <small>Go on, mark it complete!</small></h1>
    </div>

    <form action="{{ action('GamesController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $game->id }}">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $game->title }}" />
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" value="{{ $game->publisher }}" />
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" {{ $game->complete ? 'checked' : '' }} /> Complete?
            </label>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('GamesController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop