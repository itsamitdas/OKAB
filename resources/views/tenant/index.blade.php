<a href="/tenant/add"><button>Add new tenant</button></a>
<a href="logoutUser"><button>Logout</button></a>
<br/>
<br/>
<br/>

@if (session('success'))
    <div style="color: green;font-weight: bold">
        {{session('success')}}
    </div>
    <br/>
    <br/>
@endif
@if (session('error'))
    <div style="color: red;font-weight: bold">
        {{session('error')}}
    </div>
    <br/>
    <br/>
@endif

<form action="/tenant/search" method="post">
    @csrf
    <table border="1" cellspacing="0" width="70%">
        <tbody>
        <td width="20%">Search by tenant name or address</td>
        <td><input type="text" name="search" placeholder="Search by  tenant name/address" style="width: 100%"></td>
        <td align="center"><input type="submit" value="Search" name="tenantSearch"></td>
        </tbody>
    </table>
</form>

<br/><br/>
<table border="1" cellspacing="0">
    <thead>
        <th>Sl.</th>
        <th>Name</th>
        <th>Address</th>
        <th>Locality</th>
        <th>Type</th>
        <th>Purpose</th>
        <th>Rent Amount</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($tenants as $tenant)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tenant->name}}</td>
            <td>{{$tenant->address}}</td>
            <td>{{$tenant->locality}}</td>
            <td>{{$tenant->type}}</td>
            <td>{{$tenant->purpose}}</td>
            <td>{{$tenant->rent_amount}}</td>
            <td>
                <a style="color: goldenrod" href="/tenant/edit/{{$tenant->id}}">Edit</a>
                <a style="color: red" href="/tenant/delete/{{$tenant->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
