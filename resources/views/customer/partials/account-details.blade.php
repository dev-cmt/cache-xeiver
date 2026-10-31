 <style>
     .details-form-container {
         background-color: #fff;
         padding: 20px;
         border-radius: 5px;
         border: 1px solid #ced4da;
     }

     .form-row {
         display: flex;
         gap: 20px;
         margin-bottom: 15px;
     }

     .form-group {
         flex: 1;
         display: flex;
         flex-direction: column;
     }

     .form-group.full-width {
         flex: none;
         width: 100%;
         margin-bottom: 15px;
     }

     .form-group label {
         /* font-weight: bold; */
         /* color: #555; */
         margin-bottom: 5px;
     }

     input[type="text"],
     input[type="email"],
     input[type="tel"],
     input[type="password"],
     input[type="file"],
     textarea,
     select {
         width: 100%;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 4px;
         box-sizing: border-box;
     }

     textarea {
         resize: vertical;
         min-height: 80px;
     }

     .save-button {
         width: 100%;
         padding: 15px;
         background-color: #000;
         color: #fff;
         border: none;
         border-radius: 5px;
         font-size: 1.1em;
         cursor: pointer;
         transition: background-color 0.3s;
     }

     .save-button:hover {
         background-color: #333;
     }
 </style>
 <div class="details-form-container">
     <form action="{{ route('user.account.details.update') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-row">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" name="name" value="{{ Auth::guard('web')->user()->name }}" placeholder="name">
             </div>
             <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" value="{{ Auth::guard('web')->user()->email }}" placeholder="email">
             </div>
         </div>
         <div class="form-row">
             <div class="form-group">
                 <label for="phone">Phone</label>
                 <input type="tel" id="phone" name="phone" value="{{ Auth::guard('web')->user()->phone }}">
             </div>
             <div class="form-group">
                 <label for="city">City</label>
                 <select id="city" name="city">
                     <option>-- Select City --</option>
                 </select>
             </div>
         </div>
         <div class="form-group full-width">
             <label for="address">Address</label>
             <textarea id="address" name="address">{{ Auth::guard('web')->user()->address }}</textarea>
         </div>
         {{-- <div class="form-group full-width">
             <label for="image">Image</label>
             <input type="file" id="image">
         </div> --}}

         <div class="form-group full-width">
             <button type="submit" class="save-button">Save Change</button>
         </div>
     </form>
 </div>
