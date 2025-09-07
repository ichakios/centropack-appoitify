<div class="container" style="margin-top: 8em;">
    <h1>Mini CRM Dashboard</h1>

    <!-- Staff Table -->
    <h2>Staff</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff as $s): ?>
                <tr>
                    <td><?= esc($s['id']) ?></td>
                    <td><?= esc($s['name']) ?></td>
                    <td><?= $s['active'] ? 'Yes' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Services Table -->
    <h2>Services</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $srv): ?>
                <tr>
                    <td><?= esc($srv['id']) ?></td>
                    <td><?= esc($srv['name']) ?></td>
                    <td><?= esc($srv['price']) ?></td>
                    <td><?= esc($srv['duration']) ?></td>
                    <td><?= $srv['active'] ? 'Yes' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Customers Table -->
    <h2>Customers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $c): ?>
                <tr>
                    <td><?= esc($c['id']) ?></td>
                    <td><?= esc($c['firstName']) ?></td>
                    <td><?= esc($c['lastName']) ?></td>
                    <td><?= esc($c['email']) ?></td>
                    <td><?= esc($c['phone']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Appointments Table -->
    <h2>Appointments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Staff</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $a): ?>
                <tr>
                    <td><?= esc($a['id']) ?></td>
                    <td><?= esc($a['serviceId']) ?></td>
                    <td><?= esc($a['staffId']) ?></td>
                    <td><?= esc($a['customerId']) ?></td>
                    <td><?= esc($a['date']) ?></td>
                    <td><?= esc($a['startUtc']) ?></td>
                    <td><?= esc($a['endUtc']) ?></td>
                    <td><?= esc($a['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>