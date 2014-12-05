<<<<<<< HEAD
<div class="row">
    <center>
    {pictures}
        <span class="span4">
            <a href="{category}">
                <img src="{image}" title="{category}" width=30%; height=200px />
                <h3>{category}</h3>
            </a>
        </span>
    {/pictures}
    </center>
    
    <div class="newAttract">
        <a href="{n_href}">
            <img src="{n_image}" title="{n_category}" width=30% height=150px text="Just Added" />
            <!--<h4>Just Added!</h4> -->
        </a>
        <h5><a href="{n_href}">{n_caption}</a></h5>
        <p><b>Date Added:</b> {n_dateadded}
            <br/>
            <b>Location:</b> {n_location}
            <br/>
            <b>Price Range:</b> {n_pricerange}
            <br/>
            <b>Group Suitability:</b> {n_suitability}
        </p>
        <p>{n_description}</p>
    </span>     
    </div>
</div>
=======
<div class="row">
    <center>
    {pictures}
        <span class="span4">
            <a href="{category}">
                <img src="/assets/images/{image}" title="{category}" width=30%; height=200px />
                <h3>{category}</h3>
            </a>
        </span>
    {/pictures}
    </center>
    
    <div class="newAttract">
        <a href="{n_href}">
            <img src="/assets/images/{n_image}" title="{n_category}" width=30% height=150px />
            <h4>Just Added!</h4>
        </a>
        <h5>{n_caption}</h5>
        <p>{n_description}</p>
    </span>
</div>
>>>>>>> c314c95e98ced00e19e81c6124676bc8f04dff0b
