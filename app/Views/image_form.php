<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile</title>
</head>
<body>
    <?= form_open_multipart(base_url() .'account/upload_check') ?>
        <div class="form-group">
            <label for="image">Select an Image!!<br></label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    <?= form_close() ?>
</body>
</html>