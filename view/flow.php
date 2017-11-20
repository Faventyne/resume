

<div class="container">
  <div class="card w-75 mx-auto mt-auto mb-auto">
      <div class="card-body">

          <h4 class="card-title"> Add new opportunity</h4>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6">
                 <label for="firm">Title</label>
                 <input type="text" class="form-control" name="firstname" aria-describedby="emailHelp" placeholder="  ">
              </div>
              <div class="form-group col-md-6">
                 <label for="lastname">Department</label>
                 <input type="text" class="form-control" name="lastname" placeholder="">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-8">
                 <label for="firm">Company</label>
                 <input type="text" class="form-control" name="firstname" aria-describedby="emailHelp" placeholder="  ">
              </div>
              <div class="form-group col-md-4">
                 <label for="lastname">Location</label>
                 <input type="text" class="form-control" name="lastname" placeholder="">
              </div>
            </div>

            <div class="row ">
                <div class="form-group col-md-6">
                  <label for="stage">Stage</label>
                  <select class="btn btn-primary" name="stage">
                    <option value="1">Online application</option>
                    <option value="2">First job interview</option>
                    <option value="3">Second job interview</option>
                    <option value="4">Short selection</option>
                    <option value="5">Contract signature</option>
                    <option value="6">Job secured</option>
                  </select>
                 </div>

                 <div class="form-group col-md-6">
                   <label for="lastname">Number of remaining applicants</label>
                   <input type="text" class="form-control" name="nbCandidates" placeholder="">
                 </div>
              </div>

             <div class="row ">
                 <div class="form-group col-md-6">
                   <label for="opp-startdate">Application release date :</label>
                   <input type="date" class="form-control" name="opp-startdate" aria-describedby="datestart">
                   <small id="datestart" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>

                 <div class="form-group col-md-6">
                   <label for="opp-enddate">Application estimated closing date :</label>
                   <input type="date" class="form-control" name="opp-enddate" aria-describedby="dateend">
                   <small id="dateend" class="form-text text-muted"> Leave blank if unknown</small>
                 </div>
             </div>

             <div class="form-group">
               <label for="lastname">Actual company</label>
               <input type="text" class="form-control" name="company" placeholder="">
             </div>


             <input type="submit" class="btn btn-primary" name="insert_opportunity" value="Update">

           </form>
      </div>
  </div>
</div>
