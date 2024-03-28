<div style='width: 90%; margin: 0 auto;'>
    <!-- Form for submitting name and comment -->
    <form action="/handlers/form-handler.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button> <!-- Submit button -->
    </form>
</div>"