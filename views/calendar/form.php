 <div class="row">
     <div class="col-sm-6">
         <div class="mb-2">
             <label for="name">Titre</label>
             <input id="name" type="text" required class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : '' ?>">
             <?php if (isset($errors['name'])) : ?>
                 <p class="alert alert-warning small"><?= $errors['name']; ?></p>
             <?php endif; ?>
         </div>
     </div>
     <div class="col-sm-6">
         <div class="mb-2">
             <label for="date">Date</label>
             <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : '' ?>">
             <?php if (isset($errors['date'])) : ?>
                 <p class="alert alert-warning small"><?= $errors['date']; ?></p>
             <?php endif; ?>
         </div>
     </div>
 </div>

 <div class="row">
     <div class="col-sm-6">
         <div class="mb-2">
             <label for="start">Démarrage</label>
             <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : '' ?>">
             <?php if (isset($errors['start'])) : ?>
                 <p class="alert alert-warning small"><?= $errors['start']; ?></p>
             <?php endif; ?>
         </div>
     </div>
     <div class="col-sm-6">
         <div class="mb-2">
             <label for="end">Fin</label>
             <input id="end" type="time" required class="form-control" name="end" value="<?= isset($data['end']) ? h($data['end']) : '' ?>">
         </div>
     </div>
 </div>

 <div class="mb-2">
     <label for="description">Description</label>
     <textarea name="description" id="description" class="form-control"><?= isset($data['description']) ? h($data['description']) : '' ?></textarea>
 </div>