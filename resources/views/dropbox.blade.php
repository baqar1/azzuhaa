<script src="https://unpkg.com/dropbox/dist/Dropbox-sdk.min.js"></script>
<script>
    var dbx = new Dropbox({ accessToken: 'qoqSF9uPBmQAAAAAAAAD850FK2pgyzn7sWmlHDXCxeS7ySNsv0a3OFzJPEYuRAvj' });
    dbx.filesListFolder({path: ''})
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
</script>