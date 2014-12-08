<p class="row">
    <center><h2>Select Criteria For Your Search</h2></center>
    
     <form class="choose"  method="post" action="/select/post">
            <table>
                <tr>
                    <td>
                        <fieldset id="group3">
                        {foptions}
                    </td>
                    <td>
                        </fieldset>
                        {fsubmit} 
                    </td>
                </tr>
            </table>                  
        </form>
    {restaurants_heading}
 {restaurants}
    <table class="table-condensed">
            <tr style="border-top: thick solid grey">
                <td rowspan="2">
                    <img src="{image}" class ="img-rounded" width="160px" height="105px"/>
                </td>
                <td>
                    <strong>{name}</strong>
                </td>
                 <td>
                    &nbsp;&nbsp;&nbsp;<strong>Price: </strong> {price}
                </td>
            </tr>
            <tr>
                <td>
                    {group} 
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;<a class="btn btn-small" href="/eat/one/{_id}">See Details</a><br/>&nbsp;
                </td>
            </tr>
        </table>
 {/restaurants}
 {accommodations_heading}
 {accommodations}
    <table class="table-condensed">
            <tr style="border-top: thick solid grey">
                <td rowspan="2">
                    <img src="{image}" class ="img-rounded" width="160px" height="105px"/>
                </td>
                <td>
                    <strong>{name}</strong>
                </td>
                 <td>
                    &nbsp;&nbsp;&nbsp;<strong>Price: </strong> {price}
                </td>
            </tr>
            <tr>
                <td>
                    {group} 
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;<a class="btn btn-small" href="/sleep/one/{_id}">See Details</a><br/>&nbsp;
                </td>
            </tr>
        </table>
 {/accommodations}
 {explore_heading}
 {explore}
    <table class="table-condensed">
            <tr style="border-top: thick solid grey">
                <td rowspan="2">
                    <img src="{image}" class ="img-rounded" width="160px" height="105px"/>
                </td>
                <td>
                    <strong>{name}</strong>
                </td>
                 <td>
                    &nbsp;&nbsp;&nbsp;<strong>Price: </strong> {price}
                </td>
            </tr>
            <tr>
                <td>
                    {group} 
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;<a class="btn btn-small" href="/play/one/{_id}">See Details</a><br/>&nbsp;
                </td>
            </tr>
        </table>
 {/explore}
    </div>
</div>
    
</p>