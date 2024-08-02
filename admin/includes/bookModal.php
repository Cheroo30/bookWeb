<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="registrationForm"  class="form-inline">
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Author Name</label>
                                    <input type="text" class="form-control" name="penerbit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Author Email</label>
                                    <input type="date" class="form-control" name="terbit" required>
                                </div>
                                
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat" onclick="submitForm()"><i class="fa fa-save"></i> Save</button>
                            </div>
                            </div>
                        </div>
                        </div>