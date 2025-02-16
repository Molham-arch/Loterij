<?php
include "../inc/conn.php";

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$where = !empty($search) ? "WHERE firstName LIKE '%$search%' OR email LIKE '%$search%'" : '';

$sort = isset($_GET['sort']) ? $conn->real_escape_string($_GET['sort']) : 'id';
$order = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'desc' : 'asc';

$sql = "SELECT id, firstName, lastName, email FROM users $where ORDER BY $sort $order LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$total_sql = "SELECT COUNT(*) AS total FROM users $where";
$total_result = $conn->query($total_sql);
$total = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>All Participants</title>
</head>

<body>
    <div class="container mt-5">
        <a href="../index.php" class="btn btn-secondary mb-4">Back to Main</a>
        <h1 class="text-center mb-4">Participants List</h1>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                    value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        <a href="?sort=id&order=<?php echo $order === 'asc' ? 'desc' : 'asc'; ?>">ID</a>
                    </th>
                    <th scope="col">
                        <a href="?sort=firstName&order=<?php echo $order === 'asc' ? 'desc' : 'asc'; ?>">First Name</a>
                    </th>
                    <th scope="col">
                        <a href="?sort=lastName&order=<?php echo $order === 'asc' ? 'desc' : 'asc'; ?>">Last Name</a>
                    </th>
                    <th scope="col">
                        <a href="?sort=email&order=<?php echo $order === 'asc' ? 'desc' : 'asc'; ?>">Email</a>
                    </th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                    <td><?php echo htmlspecialchars($row['lastName']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this participant?');">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No participants found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <a class="page-link"
                        href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>&sort=<?php echo htmlspecialchars($sort); ?>&order=<?php echo htmlspecialchars($order); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include "../inc/db_close.php";
?>