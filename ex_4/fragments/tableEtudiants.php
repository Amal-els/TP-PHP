<?php
function tableauEtudiant($students){
  ?>
  <div class="container mt-2">
  <table id="studentsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']); ?></td>
                    <td>
                    <img src="<?= !empty($student['image']) ? htmlspecialchars($student['image']) : '../photos/default.jpg'; ?>" 
                    alt="Photo de <?= htmlspecialchars($student['name'] ?? 'Inconnu'); ?>" 
                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
                    onerror="this.onerror=null; this.src='../photos/default.jpg';">
                    </td>
                    <td><?= htmlspecialchars($student['name']); ?></td>
                    <td><?= htmlspecialchars($student['birthday']); ?></td>
                    <td><?= htmlspecialchars($student['designation'] ?? 'Non assigné'); ?></td>
                    <td class = "actions">
                        <a href="../views/detailsEtudiant.php?id=<?=$student['id']?>">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 17V11" stroke="#2F88FF" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="#2F88FF"></circle> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#2F88FF" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        </a>
                        <?php if ($_SESSION['role'] === 'admin') { ?>
                            <a href="../actions/deleteStudent_action.php?id=<?=$student['id']?>">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M14.9522 3C13.9146 3 13.0796 3.83502 11.4096 5.50506L6.5 10.4146L13.5854 17.5L18.4949 12.5904C20.165 10.9204 21 10.0854 21 9.04776C21 8.01013 20.165 7.1751 18.4949 5.50506C16.8249 3.83502 15.9899 3 14.9522 3Z" fill="#2F88FF"></path> <path d="M13.5854 17.5001L6.5 10.4147L5.50506 11.4096C3.83502 13.0796 3 13.9147 3 14.9523C3 15.9899 3.83502 16.825 5.50506 18.495C7.1751 20.165 8.01013 21.0001 9.04776 21.0001C10.0854 21.0001 10.9204 20.165 12.5904 18.495L13.5854 17.5001Z" fill="#2F88FF"></path> <g opacity="0.5"> <path d="M9.03264 21H9C9.01086 21.0003 9.02174 20.9999 9.03264 21Z" fill="#2F88FF"></path> <path d="M9.06287 21C9.85928 20.9938 10.5389 20.4938 11.5734 19.5L21 19.5C21.4142 19.5 21.75 19.8358 21.75 20.25C21.75 20.6642 21.4142 21 21 21H9.06287Z" fill="#2F88FF"></path> </g> </g></svg>
                            </a>
                            <a href="../views/updatingStudent.php?id=<?=$student['id']?>">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"></path> </g></svg>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
<?php } ?>