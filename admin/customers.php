<?php include_once("base.php") ?>
            
<div class="page_content">

    <div class="inner-sm">
        <div class="page_title">
            <h1>Customer Lists</h1>
        </div>

        <div class="form_box bus_list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Bus No</th>
                        <th scope="col">Seat No</th>
                        <th scope="col">Dep Date</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>U Mya</td>
                        <td>IV001</td>
                        <td>YGN-123</td>
                        <td>23</td>
                        <td>11-3-2023 \ 8:00am</td>
                        <td>#ride from G shop</td>
                        <td>
                            <button type="button" class="btn" title="Details"><i class="fa-sharp fa-solid fa-eye"></i></button>
                            <button type="button" class="btn" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button type="button" class="btn" title="Delete"><i class="fa-solid fa-trash"></i></button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once("footer.php") ?>