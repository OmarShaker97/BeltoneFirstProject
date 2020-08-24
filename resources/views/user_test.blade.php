
<head>
  <link rel="stylesheet" href="{{ URL::asset('css/user_test.css') }}">
</head>
<table style="width:100%">
  <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
  </tr>
  </thead>
  <tbody>
@foreach($users as $user)
    <tr>
    <td><strong>{{$user->name}}</strong></td>
    <td><em>{{$user->email}}</em></td>
    <td><em>{{$user->phone}}</em></td>
    </tr>
@endforeach
  </tbody>
</table>