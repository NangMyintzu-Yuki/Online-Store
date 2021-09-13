<?php
	include("confs/auth.php");
  	include("confs/config.php");
  
  $total = mysqli_query($conn,"SELECT id FROM books");
  $total = mysqli_num_rows($total);
  
  # Paging
	$limit = 3;
	$start = 0;
	if(isset($_GET['start'])) {
		$start = $_GET['start'];
	}
	
	$next = $start + $limit; 
	$prev = $start - $limit;
  
  $result = mysqli_query($conn,"SELECT books.*, categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id ORDER BY books.created_date DESC LIMIT $start, $limit");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Book List</h1>
	<ul class="menu">
	  <li><a href="book-list.php">Manage Books</a></li>
	  <li><a href="cat-list.php">Manage Categories</a></li>
	  <li><a href="orders.php">Manage Orders</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<ul class="books">
		<?php while($row = mysqli_fetch_assoc($result)): ?>
			<li>
				
				<b><?php echo $row['title'] ?></b>
				<i>by <?php echo $row['author'] ?></i>
				<small>(in <?php echo $row['name'] ?>)</small>

				<span>$<?php echo $row['price'] ?></span>
				<div><?php echo $row['summary'] ?></div>

				<img src="covers/<?php echo $row['cover']?>" alt="" align="center" height="140"><br>
				[<a href="book-del.php?id=<?php echo $row['id']?>" class="del">del</a>]
				[<a href="book-edit.php?id=<?php echo $row['id']?>">edit</a>]
				
			</li>
			<br>
			<hr><br>
		<?php endwhile; ?>
	</ul>
	<a href="book-new.php" class="new">New Book</a>
	<div class="paging">
		<?php if($prev < 0): ?>
			<span>&laquo; Previous</span>
			<?php else: ?>
				<a href="?start=<?= $prev ?>">&laquo; Previous</a>
			<?php endif; ?>

		<?php if($next >= $total): ?>
			<span>Next &raquo;</span>
			<?php else: ?>
			<a href="?start=<?= $next ?>">Next &raquo;</a>
		<?php endif; ?>
	</div>
<br style="clear:both">
</body>
</html>