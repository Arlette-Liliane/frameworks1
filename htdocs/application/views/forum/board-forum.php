<script>
$(document).ready(function(){
	$(".block-souscategories").hide();
	$(".block-name-souscategories").click(function(){
		var idsouscategory = $(this).attr("value");
    	$.post("forum/ajax_threads_souscategory",{idsouscategory:idsouscategory}, function(result){
    			$("#block-threads-forum").html(result);
    	});
    });
	$(".block-name-categories").click(function(){
		var idcategory = $(this).attr("value");
    	$.post("forum/ajax_threads_category",{idcategory:idcategory}, function(result){
    			$("#block-threads-forum").html(result);
    	});
		if ($(".block-souscategories-"+idcategory).hasClass("block-souscategories-show")){
			$(".block-souscategories-"+idcategory).removeClass("block-souscategories-show");
			$(".block-souscategories-"+idcategory).hide();
		}else{
			$(".block-souscategories").hide();
			$(".block-souscategories").removeClass("block-souscategories-show");
			$(".block-souscategories-"+idcategory).addClass("block-souscategories-show");
			$(".block-souscategories-"+idcategory).show();
		}
	});
});
</script>
    <div class="container-fluid">
        <div class="col-md-12">
            <h4 class="page-head-line">FORUM</h4>
        </div>
    </div>

        <div class="row">

            <div class="col-lg-2" >


                    <?php foreach($categories as $row): ?>
                    <div id="block-name-categories-<?php echo $row->id; ?>" class="block-name-categories" value="<?php echo $row->id; ?>">
                    <?php if ($row->type == 1): ?>
                        <div id="name-categories-forum-<?php echo $row->id; ?>" class="name1-categories-forum" value="<?php echo $row->id; ?>"><?php echo $row->name; ?></div>
                    <?php else: ?>
                        <div id="name-categories-forum-<?php echo $row->id; ?>" class="name2-categories-forum" value="<?php echo $row->id; ?>"><?php echo $row->name; ?></div>
                    <?php endif; ?>
                    </div>
                    <div id="block-souscategories-<?php echo $row->id; ?>" class="block-souscategories block-souscategories-<?php echo $row->id; ?>" value="<?php echo $row->id; ?>">
                    <?php foreach($souscategories as $row2): ?>
                        <?php if ($row->id == $row2->id_categories): ?>
                        <div id="block-name-souscategories-<?php echo $row->id; ?>" class="block-name-souscategories" value="<?php echo $row2->id; ?>">
                            <div id="name-souscategories-forum-<?php echo $row->id; ?>" class="name-souscategories-forum"><?php echo $row2->name; ?></div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                 </div>

            <div class="col-lg-10" id="block-threads-forum">

            </div>
        </div>




