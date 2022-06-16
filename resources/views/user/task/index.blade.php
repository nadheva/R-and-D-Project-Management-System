
<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Loading Allocation</h6>
                  </div>
                  <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#tambahPerangkat"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Task</a>
                    </div>

                </div>
                <div class="nav-wrapper position-relative ms-auto w-50">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1"
                                role="tab" aria-controls="cam1" aria-selected="true">
                                Monday
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab"
                                aria-controls="cam2" aria-selected="false">
                                Tuesday
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab"
                                aria-controls="cam3" aria-selected="false">
                                Wednesday
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam4" role="tab"
                                aria-controls="cam4" aria-selected="false">
                                Thursday
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam5" role="tab"
                                aria-controls="cam5" aria-selected="false">
                                Friday
                            </a>
                        </li>
                    </ul>
                </div>
              </div>
                <div class="card-body p-3 mt-2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show position-relative active height-400 border-radius-lg"
                            id="cam1" role="tabpanel" aria-labelledby="cam1">
                            <div class="row mt-4">
                                <div class="table-responsive">
                                    <table class="table table-flush" id="datatable-search">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Time</th>
                                                <th>Task</th>
                                                <th>Project</th>
                                                <th>Assigned Person</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($task->where('day', '=', 'monday') as $i)
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_time."-".$i->end_time }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->task }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->project }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->user->name }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_date }}</span>
                                                </td>
                                                @if($i->status == 'Open')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'On Progress')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Need Update')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Not Required')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Done')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @endif
                                                <td class="align-middle text-start">
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                                                    <form id="form-delete" action="{{route('task.destroy', $i->id)}}" method="POST" style="display: inline">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam2"
                            role="tabpanel" aria-labelledby="cam2">
                            <div class="row mt-4">
                                {{-- <div class="table-responsive"> --}}
                                    <table class="table table-flush" id="datatable-search1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Time</th>
                                                <th>Task</th>
                                                <th>Project</th>
                                                <th>Assigned Person</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($task->where('day', '=', 'tuesday') as $i)
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_time."-".$i->end_time }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->task }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->project }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->user->name }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_date }}</span>
                                                </td>
                                                @if($i->status == 'Open')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'On Progress')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Need Update')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Not Required')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Done')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @endif
                                                <td class="align-middle text-start">
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                                                    <form id="form-delete" action="{{route('task.destroy', $i->id)}}" method="POST" style="display: inline">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam3"
                        role="tabpanel" aria-labelledby="cam3">
                        <div class="row mt-4">
                            {{-- <div class="table-responsive"> --}}
                                <table class="table table-flush" id="datatable-search2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Time</th>
                                            <th>Task</th>
                                            <th>Project</th>
                                            <th>Assigned Person</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($task->where('day', '=', 'wednesday') as $i)
                                        <tr>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $i->start_time."-".$i->end_time }}</span>
                                            </td>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $i->task }}</span>
                                            </td>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $i->project }}</span>
                                            </td>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $i->user->name }}</span>
                                            </td>
                                            <td class="align-middle text-start">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $i->start_date }}</span>
                                            </td>
                                            @if($i->status == 'Open')
                                            <td class="align-middle text-start">
                                              <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                                            </td>
                                            @elseif($i->status == 'On Progress')
                                            <td class="align-middle text-start">
                                              <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                                            </td>
                                            @elseif($i->status == 'Need Update')
                                            <td class="align-middle text-start">
                                              <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                                            </td>
                                            @elseif($i->status == 'Not Required')
                                            <td class="align-middle text-start">
                                              <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                                            </td>
                                            @elseif($i->status == 'Done')
                                            <td class="align-middle text-start">
                                              <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                                            </td>
                                            @endif
                                            <td class="align-middle text-start">
                                                <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                                                <form id="form-delete" action="{{route('task.destroy', $i->id)}}" method="POST" style="display: inline">
                                                  @csrf
                                                  @method("DELETE")
                                                  <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- </div> --}}
                        </div>
                    </div>
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam4"
                            role="tabpanel" aria-labelledby="cam4">
                            <div class="row mt-4">
                                {{-- <div class="table-responsive"> --}}
                                    <table class="table table-flush" id="datatable-search3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Time</th>
                                                <th>Task</th>
                                                <th>Project</th>
                                                <th>Assigned Person</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($task->where('day', '=', 'thursday') as $i)
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_time."-".$i->end_time }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->task }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->project }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->user->name }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_date }}</span>
                                                </td>
                                                @if($i->status == 'Open')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'On Progress')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Need Update')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Not Required')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Done')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @endif
                                                <td class="align-middle text-start">
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                                                    <form id="form-delete" action="{{route('task.destroy', $i->id)}}" method="POST" style="display: inline">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam5"
                            role="tabpanel" aria-labelledby="cam5">
                            <div class="row mt-4">
                                {{-- <div class="table-responsive"> --}}
                                    <table class="table table-flush" id="datatable-search4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Time</th>
                                                <th>Task</th>
                                                <th>Project</th>
                                                <th>Assigned Person</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($task->where('day', '=', 'friday') as $i)
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_time."-".$i->end_time }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->task }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->project }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->user->name }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $i->start_date }}</span>
                                                </td>
                                                @if($i->status == 'Open')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'On Progress')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Need Update')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Not Required')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @elseif($i->status == 'Done')
                                                <td class="align-middle text-start">
                                                  <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                                                </td>
                                                @endif
                                                <td class="align-middle text-start">
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                                                    <form id="form-delete" action="{{route('task.destroy', $i->id)}}" method="POST" style="display: inline">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Perangkat -->
    <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('task.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Task:</label>
                            <input type="text" class="form-control" name="task" placeholder="*Task" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Project:</label>
                            <input type="text" class="form-control" name="project" placeholder="*Project" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Assigned Person:</label>
                            <select class="form-control" name="user_id" id="exampleFormControlSelect1" required>
                            <option value="">--Select Person--</option>
                              @foreach ($user as $i)
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Day:</label>
                            <select class="form-control" name="day" id="exampleFormControlSelect1" required>
                            <option value="" disabled>--Select Day--</option>
                            @foreach(["monday" => "Monday", "tuesday" => "Tuesday", "wednesday" => "Wednesday", "thursday" => "Thursday","friday" => "Friday"] AS $status_value => $status_label)
                            <option value="{{ $status_value }}" >{{ $status_label }}</option>
                            @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Start Date:</label>
                            <input class="form-control datetimepicker" name="start_date"  placeholder="Please select date" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Start Time:</label>
                            <input class="form-control" name="start_time"  placeholder="Please select time" type="time">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">End Time:</label>
                            <input class="form-control" name="end_time"  placeholder="Please select time" type="time">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Edit Perangkat -->
    @foreach($task as $i)
    <div class="modal fade" id="editPerangkat-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('task-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Task:</label>
                            <input type="text" class="form-control" name="task" placeholder="*Task" value="{{$i->task}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Project:</label>
                            <input type="text" class="form-control" name="project" placeholder="*Project" value="{{$i->project}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Assigned Person:</label>
                            <select class="form-control" name="user_id" id="exampleFormControlSelect1" required>
                            <option value="{{$i->user_id}}" selected>{{$i->user->name}}</option>
                              @foreach ($user as $u)
                              <option value="{{$u->id}}">{{$u->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Day:</label>
                            <select class="form-control" name="day" id="exampleFormControlSelect1" required>
                            <option value="{{$i->day}}" selected>{{$i->day}}</option>
                            @foreach(["monday" => "Monday", "tuesday" => "Tuesday", "wednesday" => "Wednesday", "thursday" => "Thursday","friday" => "Friday"] AS $status_value => $status_label)
                            <option value="{{ $status_value }}" {{ old("day", $i->day) == $status_value ? "selected" : "" }}>{{ $status_label }}</option>
                            @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Start Date:</label>
                            <input class="form-control datetimepicker" name="start_date" value="{{$i->start_date}}"  placeholder="Please select date" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Start Time:</label>
                            <input class="form-control" name="start_time" value="{{$i->start_time}}"  placeholder="Please select time" type="time">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">End Time:</label>
                            <input class="form-control" name="end_time" value="{{$i->end_time}}"  placeholder="Please select time" type="time">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Status:</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                            @foreach(["Need Update" => "Need Update", "Open" => "Open", "On Progress" => "On Progress", "Done" => "Done", "Not Required" => "Not Required"] AS $status_value => $status_label)
                            <option value="{{ $status_value }}" {{ old("status", $i->status) == $status_value ? "selected" : "" }}>{{ $status_label }}</option>
                            @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @push('scripts')
    {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
    {{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
    <script>
      const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
      });
      const dataTableSearch1 = new simpleDatatables.DataTable("#datatable-search1", {
        searchable: true,
        fixedHeight: true
      });
      const dataTableSearch2 = new simpleDatatables.DataTable("#datatable-search2", {
        searchable: true,
        fixedHeight: true
      });
      const dataTableSearch3 = new simpleDatatables.DataTable("#datatable-search3", {
        searchable: true,
        fixedHeight: true
      });
      const dataTableSearch4 = new simpleDatatables.DataTable("#datatable-search4", {
        searchable: true,
        fixedHeight: true
      });
      if (document.querySelector('.datetimepicker')) {
                flatpickr('.datetimepicker', {
                    allowInput: true
                }); // flatpickr
            }
        // $('#timepicker').timepicker({
        //     uiLibrary: 'bootstrap4'
        // });
        // $('.timepicker').timepicker();
        // $('.timepicker').timepicker({
        // showInputs: false,
        // showMeridian: false
        // });
        // $('#timepicker1').timepicker({
        //     uiLibrary: 'bootstrap4'
        // });

      $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                title: `Delete Task?`,
                  text: "If the data is deleted, the data will be lost forever!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });


    </script>
    @endpush
  </x-app-layout>
