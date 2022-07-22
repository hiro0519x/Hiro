<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script>
var searchBox = '.search-box';
var searchItem = '.search-box input';
var listItem = '.cat_image';
var hideClass = 'is-hide';

$(function() {
   $(document).on('change', searchBox + ' input', function() {
    search_filter();
  });
});

function search_filter() {
  $(listItem).removeClass(hideClass);
  for (var i = 0; i < $(searchBox).length; i++) {
    var name = $(searchBox).eq(i).find('input').attr('name');
    var searchData = get_selected_input_items(name);
    if(searchData.length === 0 || searchData[0] === '') {
      continue;
    }
    for (var j = 0; j < $(listItem).length; j++) {
      var itemData = get_setting_values_in_item($(listItem).eq(j), name);
      var check = array_match_check(itemData, searchData);
      if(!check) {
        $(listItem).eq(j).addClass(hideClass);
      }
    }
  }
}

function get_selected_input_items(name) {
  var searchData = [];
  $('[name=' + name + ']:checked').each(function() {
    searchData.push($(this).val());
  });
  return searchData;
}

function get_setting_values_in_item(target, data) {
  var itemData = target.data(data);
  if(!Array.isArray(itemData)) {
    itemData = [itemData];
  }
  return itemData;
}

function array_match_check(arr1, arr2) {
  var arrCheck = false;
  for (var i = 0; i < arr1.length; i++) {
    if(arr2.indexOf(arr1[i]) >= 0) {
      arrCheck = true;
      break;
    }
  }
  return arrCheck;
}
</script>

<style>
.search-box_title{
	font-weight: bold;
}
.search-box label {
	cursor: pointer;
	display: inline-block;
	margin-right: 10px;
	line-height: 16px;
}
.search-box input[type="radio"] {
	width: 16px;
	height: 16px;
	margin: -2px 5px 0 0;
	padding: 0;
	box-sizing: border-box;
	vertical-align: middle;
}
.search-box input[type="checkbox"] {
	width: 16px;
	height: 16px;
	margin: -2px 5px 0 0;
	padding: 0;
	box-sizing: border-box;
	vertical-align: middle;
}
.cat_image_all {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	max-width: 680px;
	margin: 3em auto 0;
}
.cat_image {
	width: 48%;
	max-width: 320px;
	margin: 0 0 2em;
}
.cat_image.is-hide {
	display: none;
}
.cat_image a {
	display: block;
	color: #444;
}
.cat_image a:hover {
	text-decoration: underline;
}
</style>

<html>
<div class="search-box">
    <span class="search-box_title">Language：</span>
    <label><input type="checkbox" name="language" value="">全て</label>
    <label><input type="checkbox" name="language" value="language1">English</label>
    <label><input type="checkbox" name="language" value="language2">Chinese</label>
    <label><input type="checkbox" name="language" value="language3">German</label>
    <label><input type="checkbox" name="language" value="language4">French</label>
</div>
<div class="search-box">
    <span class="search-box_title">Acceptanse rate：</span>
    <label><input type="checkbox" name="ratio" value="">全て</label>
    <label><input type="checkbox" name="ratio" value="ratio1">0-20%</label>
    <label><input type="checkbox" name="ratio" value="ratio2">20-40%</label>
    <label><input type="checkbox" name="ratio" value="ratio3">40-60%</label>
    <label><input type="checkbox" name="ratio" value="ratio4">60-80%</label>
</div>
<div class="search-box">
	<span class="search-box_title">QS rank：</span>
	<label><input type="checkbox" name="QS" value="">全て</label>
    <label><input type="checkbox" name="QS" value="QS1">0-20</label>
    <label><input type="checkbox" name="QS" value="QS2">20-50</label>
    <label><input type="checkbox" name="QS" value="QS3">50-100</label>
    <label><input type="checkbox" name="QS" value="QS4">100-150</label>
    <label><input type="checkbox" name="QS" value="QS5">150-250</label>
    <label><input type="checkbox" name="QS" value="QS6">250-500</label>
</div>
<div class="search-box">
	<span class="search-box_title">anual tuition fees：</span>
	<label><input type="checkbox" name="fee" value="">全て</label>
    <label><input type="checkbox" name="fee" value="fee1">0-50万</label>
    <label><input type="checkbox" name="fee" value="fee2">50万-100万</label>
    <label><input type="checkbox" name="fee" value="fee3">100万-150万</label>
    <label><input type="checkbox" name="fee" value="fee4">絞り込み条件d</label>
    <label><input type="checkbox" name="fee" value="fee5">絞り込み条件e</label>
</div>

<div class="cat_image_all">
	<div class="cat_image" data-language="language1" data-ratio="ratio4" data-QS="QS6" data-fee=fee1>
	    
        University polytechnica of bucharest
        qs rank:500 anual tuition fees:30万　
        acceptance rate:80% language:english
        
        <a href="https://apply.upb.ro/">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">Online Application form</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language1" data-ratio="ratio3" data-QS="QS3" data-fee=fee2>
    
        Central European Universisty
        qs rank sociology:60 anual tuition fees:100万　
        acceptance rate:50% language:english
        <a href="https://www.ceu.edu/apply">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">Online Application form</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language2" data-shop="shop1" data-category="category2" data-fee="fee3">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
 <div class="cat_image_all">
	<div class="cat_image" data-language="language1" data-shop="shop3" data-category="category1" data-fee="fee4">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language3" data-shop="shop3" data-category="category1" data-fee="fee4">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language2" data-shop="shop3" data-category="category1" data-fee="fee4">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language4" data-shop="shop3" data-category="category1" data-fee="fee4">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
<div class="cat_image_all">
	<div class="cat_image" data-language="language2" data-shop="shop3" data-category="category1" data-fee="fee4">
		<a href="リンク先のURL">
		<img src="画像のURL" alt="画像の説明">
		<p class="page_title">テキストリンクのテキスト</p>
		</a>
	</div>
</div>
</html>

