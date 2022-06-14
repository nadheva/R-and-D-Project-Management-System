<x-app-layout>
    {{-- @if(Auth::user()->where('role', '=', 'Admin')) --}}
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Model</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#tambahPerangkat"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Model</a>
              </div>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table id="datatable-search" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($model as $i)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $i->name }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <img src="{{ asset( $i->image) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $i->description !!}</span>
                  </td>
                  <td>
                    <div class="align-middle text-center">
                      <form id="form-delete" action="{{route('model.destroy', $i->id)}}" method="POST" style="display: inline">
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
                <form method="post" action="{{ route('model.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Add Model</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Model Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="*Model name" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Model Image:</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Model Description:</label>
                            <textarea class="form-control" name="description" id="mytextarea" placeholder="*Model description" required></textarea>
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
    @foreach($model as $i)
    <div class="modal fade" id="editPerangkat-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('model-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit Model</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Model Name:</label>
                            <input type="text" class="form-control" name="name" value="{{$i->name}}">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Model Image:</label>
                            <input type="file" class="form-control" name="image" value="{{asset($i->image)}}">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Model Description:</label>
                            <textarea class="form-control" name="description" id="mytextarea" value="{{$i->description}}">{{$i->description}}</textarea>
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


      $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                title: `Delete Model?`,
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
