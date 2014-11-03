<!-- form to edit a menu item -->
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

<p class="other2">
    <h5>Or delete</h5>
    <a href="/admin/delete/{id}">
    <button type="button" Onclick="return ConfirmDelete();"data-confirm="Are you sure to delete this item?" class="btn btn-small btn-inverse delete" style="height:35px;width:50px">Delete</button>
    </a>
</p>