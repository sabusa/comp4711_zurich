<!-- form to edit a menu item -->
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
<p class="other2">
    <h5>Or delete</h5>
    <a href="/admin/delete/{id}">
    <button type="button" Onclick="return ConfirmDelete();"data-confirm="Are you sure to delete this item?" class="btn btn-small btn-inverse delete" style="height:35px;width:50px">Delete</button>
    </a>
</p>
</div>
</center>