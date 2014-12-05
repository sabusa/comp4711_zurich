<<<<<<< HEAD

<p class="lead">
<center><h2>Click on an attraction below to edit it</h2></center>
</p>
<center>
<div class="row">
    
    {pictures}
    <span class="span4">
        <a href="/admin/edit/{id}">
            <img src="{image}" title="{category}" width=15% height=150px />
            <h6>{name}</h6>
        </a>
    </span>
    {/pictures}
    
</div>
</center>
<p class="other">
<center>
    <h2>
        <a href="/admin/add_new" style="height:50px;width:100px"> 
            Click here to add a new attraction
        </a>
    </h2>
</center>
</p>
    

    
=======

<p class="lead">
    <h5>Click on an attraction below to edit it</h5>
</p>

<div class="row">
    <center>
    {pictures}
    <span class="span4">
        <a href="/admin/edit/{id}">
            <img src="/assets/images/{image}" title="{category}" width=15% height=150px />
            <h6>{caption}</h6>
        </a>
    </span>
    {/pictures}
    </center>
</div>

<p class="other">
    <h5>Or add a new attraction</h5>
    <a href="/admin/add_new">
        <button type="button" class="btn btn-large btn-default" style="height:50px;width:100px">New</button>
    </a>
</p>
    

    
>>>>>>> c314c95e98ced00e19e81c6124676bc8f04dff0b
            