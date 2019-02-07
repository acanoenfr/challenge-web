<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <section id='section2'>
      <div class="center-align">
      <h1 class="header center teal-text">Ajouter un message</h1>

            <div class="row">
                <form name="add-form" class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="content">Content</label>
                            <textarea id="content"  name="content" class="materialize-textarea"></textarea>
                            <div class="comments"></div>
                        </div>
                    </div>
                    <div class="row">             
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input id="image" name="image" type="file">
                                <div class="comments"></div>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" class="" value="">
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="add">Publier
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>

      <br><br>
      </section>
    </div>
  </div>