<!-- form to edit a menu item -->
<<<<<<< HEAD
<center>
    <h2>Editing {name}</h2>
<div class="editing">
    <center>
<form action="/admin/post/{id}" enctype="multipart/form-data" method="post">
    {fid}
    {fname}
    {fcaption}
    {flocation}
    {fdescription}
    
    {fcategory}
    {fpricerange}
    {fsuitability}
    {fspecifics}
    {fdateAdded}
   
    {fimage}
    {fupload}
    
    {fsubimage1}
    {fupload1}
    {fsubimage2}
    {fupload2}
    {fsubimage3}
    {fupload3}
    
    <div hidden="true">
        {imgMain}
        {imgSub1}
        {imgSub2}
        {imgSub3}
    </div>

    {fsubmit}
</form>
</center>
=======
<form action="/admin/post/{id}" method="post">
    {fid}
    {fcategory}
    {fcaption}
    {fdescription}
    {flocation}
    {fprice}
    {fdateAdded}
    {fimage}
    {fsubimage1}
    {fsubimage2}
    {fsubimage3}
    {fsubmit}
</form>

>>>>>>> c314c95e98ced00e19e81c6124676bc8f04dff0b
<p class="other2">
    <h5>Or delete</h5>
    <a href="/admin/delete/{id}">
    <button type="button" Onclick="return ConfirmDelete();"data-confirm="Are you sure to delete this item?" class="btn btn-small btn-inverse delete" style="height:35px;width:50px">Delete</button>
    </a>
<<<<<<< HEAD
</p>
</div>
</center>
=======
</p>
>>>>>>> c314c95e98ced00e19e81c6124676bc8f04dff0b
