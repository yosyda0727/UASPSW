<x-app-layout title="Home">
    <section>
        <div class=""
            style="margin: 0; padding: 300px 150px 150px 150px; background-image:  url('image/bg.jpg'); background-size: cover; background-position: center; background-attachment: fixed; ">
            <div class="">

                <h2 style="color: white;">Welcom in Pniel badminton</h2>

            </div>
            <div>
                <button
                    style="background-color: transparent; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer; transition: background-color 0.1s ease; border-radius: 50px; margin-top: 30px; "><a
                        style="color: white;" href="{{ route('product.index') }}">Pelajari Lebih --><br>Lanjut
                    </a></button>
            </div>

            <div>
                <img src="img/bg/taput.png" alt="" style="width: 200px; float: right; margin-top: -275px;">
            </div>
        </div>
    </section>
</x-app-layout>
