<form action="/tenant/store" method="post">
    @csrf

    Name : <input type="text" name="name" placeholder="Please enter name." required/><br/><br/>
    Address : <textarea name="address" placeholder="Please enter address." required></textarea><br/><br/>
    Locality : <input type="text" name="locality" placeholder="Please enter locality."/><br/><br/>
    Type :
    <select name="type" required>
        <option value="">--Select--</option>
        <option value="Commercial">Commercial</option>
        <option value="Residential">Residential</option>
    </select><br/><br/>
    Purpose : <input type="text" name="purpose" placeholder="Please enter purpose." required/><br/><br/>
    Rent Amount : <input type="number" name="rent_amount" placeholder="Please enter rent amount." required/><br/><br/>

    <input type="submit" name="tenantSubmit" value="Submit"/>

</form>
