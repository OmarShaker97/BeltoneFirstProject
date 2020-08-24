
<head>
  <link rel="stylesheet" href="{{ URL::asset('css/user_test.css') }}">
</head>

<form method="POST" action="{{ route('create')}}">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
	<tr>
	<td>Name</td>
	<td><input type='text' name='name' /></td>
  <td>Email</td>
	<td><input type='text' name='email' /></td>
  <td>Phone</td>
	<td><input type='text' name='phone' /></td>
  <td><input type = 'submit' value = "Add User"/></td>
	</tr>
</table>
</form>

<table style="width:100%">
  <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>

    @foreach($users as $user)
    <tr>
    <td>
      <strong>{{$user->name}}</strong>
    </td>
    <td><em>{{$user->email}}</em></td>
    <td><em>{{$user->phone}}</em></td>
    <td><a href = "{{ route('delete', $user->id) }}">Delete</a></td>
    </tr>
@endforeach
  </tbody>
</table>