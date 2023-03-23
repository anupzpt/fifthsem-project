<section class="contact py-4 bg-light-grey-color-shade" id="contact">
    <div class="container">
        <div class="section-title text-dark">
            <h2>Contact</h2>
            <div class="line"></div>
        </div>
        <div class="contact-content grid">
            <div class="contact-right">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.47339855874!2d-0.24168085317947707!3d51.528558242069835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2snp!4v1639724107420!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                <div class="contact-info grid text-center text-dark">
                    <div class="contact-info-group">
                        <span class="text-green">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </span>
                        <p class="text font-md fw-6">
                            Chakrapath, Kathmandu, Nepal
                        </p>
                    </div>
                    <div class="contact-info-group">
                        <span class="text-green">
                            <i class="fas fa-envelope fa-2x"></i>
                        </span>
                        <p class="text font-md fw-6">artihc@gmail.com</p>
                    </div>
                    <div class="contact-info-group">
                        <span class="text-green">
                            <i class="fas fa-phone fa-2x"></i>
                        </span>
                        <p class="text font-md fw-6">+977- 9804673542</p>
                    </div>
                </div>
            </div>

            <div class="contact-left text-dark">
                @if(Session::has('message_sent'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message_sent')}}
                    </div>
                @endif
                <form  method="POST" action="{{route('contact.send')}}" enctype="multipart/form-data" class="text-center text-white" >
                    @csrf
                    <div class="form">
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" />
                    </div>
                    <div class="form">
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email" />
                    </div>
                    <!-- <div class="form">
                        <select name="Select" class="form-control">
                            <option value="user">User</option>
                            <option value="artist">Artist</option>s
                        </select>
                    </div> -->
                    <div class="form">
                        <textarea name="msg" class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message" rows="3">
                        </textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn-header text-white bg-brown">
                            Send
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
