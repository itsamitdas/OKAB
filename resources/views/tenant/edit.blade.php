<form action="/tenant/update" method="post">
    @csrf

    Name : <input type="text" name="name" placeholder="Please enter name." value="{{$tenant->name}}" required/><br/><br/>
    Address : <textarea name="address" placeholder="Please enter address." required>{{$tenant->address}}</textarea><br/><br/>
    Locality : <input type="text" name="locality" placeholder="Please enter locality." value="{{$tenant->locality}}"/><br/><br/>
    Type :
    <select name="type" required>
        <option value="">--Select--</option>
        <option value="Commercial" {{$tenant->type == "Commercial" ? 'selected' : ""}}>Commercial</option>
        <option value="Residential" {{$tenant->type == "Residential" ? 'selected' : ""}}>Residential</option>
    </select><br/><br/>
    Purpose : <input type="text" name="purpose" placeholder="Please enter purpose." value="{{$tenant->purpose}}" required/><br/><br/>
    Rent Amount : <input type="number" name="rent_amount" placeholder="Please enter rent amount." value="{{$tenant->rent_amount}}" required/><br/><br/>

    <input type="hidden" name="id" value="{{$tenant->id}}"/>
    <input type="submit" name="tenantUpdate" value="Update"/>

</form>
