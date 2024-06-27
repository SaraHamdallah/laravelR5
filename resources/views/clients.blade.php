<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
  <title>Clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')
<div class="container">
  <h2>{{__('messages.client_data')}}</h2>
     
  <table class="table table-hover">
    <thead>
      <tr>
        <th>{{__('messages.client_name')}}</th>
        <th>{{ __('messages.phone')}}</th>
        <th>{{ __('messages.email')}}</th>
        <th>{{ __('messages.website')}}</th>
        <th>{{ __('messages.Active')}}</th>
        <th>{{ __('messages.Edit')}}</th>
        <th>{{ __('messages.Show')}}</th>
        <th>{{ __('messages.Delete')}}</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($clients as $client) <!-- foreach ("name of compact" as $client) -->
      <tr>
        <td>{{ $client->clientName }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->website }}</td>
        <td>{{ $client->active ? 'Yes' : 'No'}}</td>
        <td><a href="{{ route('editClient', $client->id) }}">{{ __('messages.Edit')}}</a></td>
        <td><a href="{{ route('showClient', $client->id) }}">{{ __('messages.Show')}}</a></td>
        <td>
          <form action="{{ route('delClient') }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $client->id }}" name="id">
            <input type="submit" value="{{ __('messages.Delete')}}">
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
