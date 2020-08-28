<!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="load-msg">
                             
                  
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
                  <div class="input-group">
                    <textarea id="isi_chat" name="isi_chat" required="" placeholder="Tulis Pesan.." class="form-control"></textarea>
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary" id="send" data-id="<?= $user['id_user'] ?>"><i class="fas fa-paper-plane"></i></button>
                    </span>
                  </div>
                
            </div>
            <!-- /.card-footer-->
        </div>
        <!--/.direct-chat -->