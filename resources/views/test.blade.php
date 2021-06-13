    <h1>HI</h1>

    <p>
        <?php
            use Http\Controllers\UserLogs;
            echo Auth::user()->name.'<br>'.Auth::user()->previousLoginAt().'<br>'.Auth::user()->is_admin;
        ?>
    </p>
    <script>
        let contacts = new Map()
        contacts.set('Jessie', {phone: "213-555-1234", address: "123 N 1st Ave"})
        contacts.has('Jessie') // true
        contacts.get('Hilary') // undefined
        contacts.set('Hilary', {phone: "617-555-4321", address: "321 S 2nd St"})
        contacts.get('Jessie') // {phone: "213-555-1234", address: "123 N 1st Ave"}
        contacts.delete('Raymond') // false
        contacts.delete('Jessie') // true
        console.log(contacts.size) // 1
    </script>
