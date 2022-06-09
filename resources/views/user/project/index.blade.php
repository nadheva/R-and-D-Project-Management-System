<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Project Status</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#tambahPerangkat"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Project Status</a>
              </div>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table id="datatable-search" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Model</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Item</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PIC</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remark </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($project as $i)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $i->model->name }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $i->item->name }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{{$i->sub_item->name}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $i->user->name }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $i->remark }}</span>
                  </td>
                  @if($i->status == 'Open')
                  <td class="align-middle text-center">
                    <span class="badge badge-primary badge-sm font-weight-bold" >{{ $i->status }}</span>
                  </td>
                  @elseif($i->status == 'On Progress')
                  <td class="align-middle text-center">
                    <span class="badge badge-info badge-sm font-weight-bold" >{{ $i->status }}</span>
                  </td>
                  @elseif($i->status == 'Need Update')
                  <td class="align-middle text-center">
                    <span class="badge badge-warning badge-sm font-weight-bold" >{{ $i->status }}</span>
                  </td>
                  @elseif($i->status == 'Not Required')
                  <td class="align-middle text-center">
                    <span class="badge badge-danger badge-sm font-weight-bold" >{{ $i->status }}</span>
                  </td>
                  @elseif($i->status == 'Done')
                  <td class="align-middle text-center">
                    <span class="badge badge-success badge-sm font-weight-bold" >{{ $i->status }}</span>
                  </td>
                  @endif
                  <td>
                    <div class="align-middle text-center">
                      <form id="form-delete" action="{{route('project.destroy', $i->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                      </form>
                      <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}"><i class="fas fa-user-edit text-secondary"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah Perangkat -->
    <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Add Project Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Model:</label>
                            <select class="form-control" name="model_id" id="exampleFormControlSelect1" required>
                              <option value="">--Select Model--</option>
                              @foreach ($model as $i)
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Item:</label>
                            <select class="form-control" name="item_id" id="exampleFormControlSelect1" required>
                              <option value="">--Select Item--</option>
                              @foreach ($item as $i)
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Sub Item:</label>
                            <select class="form-control" name="sub_item_id[]" multiple="multiple" data-live-search="true" id="select2Multiple" required>
                              @foreach ($sub_item as $i)
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">PIC:</label>
                            <select class="form-control" name="user_id" id="exampleFormControlSelect1" required>
                            <option value="">--Select PIC--</option>
                              @foreach ($user as $i)
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Remark:</label>
                            <input type="text" class="form-control" name="remark" placeholder="*Remark" required>
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
    @foreach($project as $i)
    <div class="modal fade" id="editPerangkat-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('project-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit Project Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Model:</label>
                                <select class="form-control" name="model_id" id="exampleFormControlSelect1" required>
                                  <option value="{{$i->model_id}}">{{$i->model->name}}</option>
                                  @foreach ($model as $m)
                                  <option value="{{$m->id}}">{{$m->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Item:</label>
                                <select class="form-control" name="item_id" id="exampleFormControlSelect1" required>
                                    {{-- <option value="{{$i->item_id}}">{{$i->item->name}}</option> --}}
                                  @foreach ($item as $a)
                                  <option value="{{$a->id}}">{{$a->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Sub Item:</label>
                                <select class="form-control" name="sub_item_id[]" multiple="multiple" data-live-search="true" id="select2Multiple" required>
                                  @foreach ($sub_item as $s)
                                  <option value="{{$s->id}}" {{ old("sub_item_id[]", $s->id) == $s->id ? "selected" : "" }}>{{$s->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">PIC:</label>
                                <select class="form-control" name="user_id" id="exampleFormControlSelect1" required>
                                {{-- <option value="{{$i->user_id}}">{{$i->user->name}}</option> --}}
                                  @foreach ($user as $u)
                                  <option value="{{$u->id}}">{{$u->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Remark:</label>
                                <input type="text" class="form-control" name="remark" value="{{$i->remark}}" placeholder="*Remark" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Status:</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                                {{-- <option value="{{$i->status}}" disabled>{{$i->status}}</option> --}}
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
    <script>
      const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
      });
      if (document.querySelector('.datetimepicker')) {
                flatpickr('.datetimepicker', {
                    allowInput: true
                }); // flatpickr
            }

      $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                title: `Delete Project Status?`,
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

        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });


    </script>
    @endpush
  </x-app-layout>
