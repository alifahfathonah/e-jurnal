            <!-- DIRECT CHAT -->
            <div class="card bg-dark direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Ruang Komentar</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
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
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chatModal">
                  Kirim Komentar
                </button>
            </div>
            <!--/.direct-chat -->
            </div>


              <!-- Modal -->
              <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content bg-dark">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Chat Room</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                      <!-- DIRECT CHAT -->
                      <div class="card direct-chat direct-chat-primary">
                    
                            <!-- /.card-header -->

                              <div class="direct-chat-messages bg-dark" id="load-msg2">                                           
                                

                      </div>
                      <!--/.direct-chat -->

                    </div>
                    <div class="modal-footer">
                      <div class="input-group">
                        <textarea required id="isi_chat" name="isi_chat" required="" placeholder="Tulis Pesan.." class="form-control"></textarea>
                        <input type="hidden" id="tugas_siswa_id" value="<?= $materi_id; ?>" name="tugas_siswa_id">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-primary" id="send" data-id="<?= $user['id_user'] ?>"><i class="fas fa-paper-plane"></i></button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                  <script type="text/javascript">
    $(document).ready(function(){
    
    var start=0;

    $("#load-msg").mousedown(function(){
        start=1               
    })

    $("#load-msg2").mousedown(function(){
        start=1               
    })

    $("#send").click(function() {
      var user_id = $(this).data('id')
      var tugas_siswa_id = $("#tugas_siswa_id").val()
      var isi_chat = $("#isi_chat").val()
      $.ajax({
        url: "<?= base_url('User/Chat/sendMessageByTugasSiswa') ?>",
        method : "POST",
        data: {
          user_id : user_id,
          tugas_siswa_id : tugas_siswa_id,
          isi_chat : isi_chat
        },
        success:function(){
          start=0
          $("#isi_chat").val("")      
        },
        error:function(){
          alert('Kesalahan terjadi')
        }
      })
    })

    function loadMsg() {
      var tugas_siswa_id = $('#tugas_siswa_id').val()
      $.get("<?= base_url('User/Chat/loadMessageByTugasSiswa/'); ?>"+tugas_siswa_id,function(response){
        $('#load-msg').html(response)
        $('#load-msg2').html(response)
      })

      if (start==0) {
        var objDiv = document.getElementById("load-msg");
        objDiv.scrollTop = objDiv.scrollHeight;
        var objDiv2 = document.getElementById("load-msg2");
        objDiv2.scrollTop = objDiv2.scrollHeight;
      }
    }

    setInterval(function(){
        loadMsg()
    },1000)


    })
  </script>