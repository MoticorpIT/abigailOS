<!-- Complete Task Modal -->
<div class="modal fade" id="complete-task-modal" tabindex="-1" role="dialog" aria-labelledby="complete-task-modal-heading" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="complete-task-modal-heading">
          <i class="far fa-check-circle"></i>
          Complete Task
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container task-form-container">
          <form class="row task-form reschedule-task-form">
            <div class="col-6 task-details">
              <div class="form-group flexed">
                <label for="task-due-date-orig">Task Due Date:</label>
                <div class="input-group">
                   <input type="date" readonly disabled class="form-control" id="task-due-date-orig">
                   <div class="input-group-append">
                     <div class="input-group-text">
                       <i class="fas fa-calendar-alt"></i>
                     </div>
                   </div>
                 </div> <!-- input group -->
              </div> <!-- form group -->
              <div class="form-group">
                 <label for="task-description">Task Description:</label>
                 <textarea readonly disabled class="form-control" id="task-description" rows="5">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit.
                 </textarea>
               </div> <!-- form group -->
            </div> <!-- col -->
            <div class="col-6">
              <div class="task-balance-amount-group">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="task-amount-paid">Balance Due:</label>
                      <div class="input-group">
                         <input type="text" readonly disabled class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
                         <div class="input-group-append">
                           <div class="input-group-text">
                             <i class="fas fa-file-invoice-dollar"></i>
                           </div>
                         </div>
                      </div> <!-- input group -->
                    </div> <!-- form group -->
                  </div> <!-- col -->
                  <div class="col-6">
                    <div class="form-group">
                      <label for="task-amount-paid">Amount Paid:</label>
                      <div class="input-group">
                         <input type="text" class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
                         <div class="input-group-append">
                           <div class="input-group-text">
                             <i class="fas fa-clipboard-check"></i>
                           </div>
                         </div>
                      </div> <!-- input group -->
                    </div> <!-- form group -->
                  </div> <!-- col -->
                </div> <!-- row -->
              </div> <!-- task-balance-amount-group -->
              <div class="form-group flexed">
                <label for="task-amount-paid">Remaining Balance:</label>
                <div class="input-group">
                   <input type="text" class="form-control money" id="task-amount-paid" placeholder="$1,500.00">
                   <div class="input-group-append">
                     <div class="input-group-text">
                       <i class="fas fa-file-invoice-dollar"></i>
                     </div>
                   </div>
                </div> <!-- input group -->
              </div> <!-- form group -->
              <div class="form-group">
                 <label for="task-note">Add a note:</label>
                 <textarea class="form-control" id="task-note" rows="2" placeholder="You can add an optional note..."></textarea>
               </div> <!-- form group -->
            </div> <!-- col -->
          </form> <!-- row -->
        </div> <!-- container -->
      </div>
      <div class="modal-footer">
        <button type="button" class="switch-link" data-dismiss="modal" data-toggle="modal" data-target="#reschedule-task-modal">
          <i class="fas fa-sync-alt"></i>
          Reschedule this task instead?
        </button>
        <a href="#0" class="btn btn-secondary">
          <i class="fas fa-edit"></i>
          Edit Task
        </a>
        <button type="button" class="btn btn-primary btn-green">
          <i class="far fa-check-circle"></i>
          Complete Task
        </button>
      </div>
    </div>
  </div>
</div> <!-- complete task modal -->

<!-- Reschedule Task Modal -->
<div class="modal fade" id="reschedule-task-modal" tabindex="-1" role="dialog" aria-labelledby="reschedule-task-modal-heading" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reschedule-task-modal-heading">
          <i class="fas fa-history"></i>
          When should we reschedule?
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container task-form-container">
          <form class="row task-form reschedule-task-form">
            <div class="col-6 task-details">
              <div class="form-group flexed">
                <label for="task-due-date-orig">Task Due Date:</label>
                <div class="input-group">
                   <input type="date" readonly disabled class="form-control" id="task-due-date-orig">
                   <div class="input-group-append">
                     <div class="input-group-text">
                       <i class="fas fa-calendar-alt"></i>
                     </div>
                   </div>
                 </div> <!-- input group -->
              </div> <!-- form group -->
              <div class="form-group">
                 <label for="task-description">Task Description:</label>
                 <textarea readonly disabled class="form-control" id="task-description" rows="5">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit.
                 </textarea>
               </div> <!-- form group -->
            </div> <!-- col -->
            <div class="col-6">
              <div class="form-group flexed">
                <label for="task-quick-reschedule">Quick Reschedule:</label>
                <div class="input-group">
                  <select class="form-control" id="task-quick-reschedule">
                    <option>2 days from now</option>
                    <option>1 week from now</option>
                    <option>2 weeks from now</option>
                    <option>1 month from now</option>
                  </select>
                </div> <!-- input group -->
              </div> <!-- form group -->
              <div class="form-group flexed">
                <label for="task-due-date-new">New Due Date:</label>
                <div class="input-group">
                   <input type="date" class="form-control" id="task-due-date-new">
                   <div class="input-group-append">
                     <div class="input-group-text">
                       <i class="fas fa-calendar-alt"></i>
                     </div>
                   </div>
                 </div> <!-- input group -->
              </div> <!-- form group -->
              <div class="form-group">
                 <label for="task-note">Add a note:</label>
                 <textarea class="form-control" id="task-note" rows="2" placeholder="You can add an optional note..."></textarea>
               </div> <!-- form group -->
            </div> <!-- col -->
          </form> <!-- row -->
        </div> <!-- container -->
      </div>
      <div class="modal-footer">
        <button type="button" class="switch-link" data-dismiss="modal" data-toggle="modal" data-target="#complete-task-modal">
          <i class="fas fa-sync-alt"></i>
          Complete this task instead?
        </button>
        <a href="#0" class="btn btn-secondary">
          <i class="fas fa-edit"></i>
          Edit Task
        </a>
        <button type="button" class="btn btn-primary">
          <i class="fas fa-history"></i>
          Reschedule Task
        </button>
      </div>
    </div>
  </div>
</div> <!-- reschedule task modal -->
