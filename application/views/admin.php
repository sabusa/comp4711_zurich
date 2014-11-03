
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
    <a href="/admin/add/">
        <button type="button" class="btn btn-large btn-default">New</button>
    </a>
            