<div class="border border-dark bg-white">
    <!--form id="quoteform" role="form" action="" method="POST"-->
    <div id="quoteform" role="form" class="px-2 pb-2 bg-light text-dark">
        <div class="text-center">
            <h3>Get a quote</h3>
        </div>
        <input type="text" class="form-control mt-3" id="name" name="name" required placeholder="Name">
        <input type="email" class="form-control mt-3" id="email" name="email" required placeholder="Email">
        <select class="form-select form-control mt-3" id="capability" name="capability">
            <option selected>Select a capability</option>
            <option value="1">Design</option>
            <option value="2">Production</option>
            <option value="3">Certification</option>
        </select>
        <textarea class="form-control mt-3" id="comments" name="comments" rows="4" 
 placeholder="Comments"></textarea>
        <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
            <label class="form-check-label" for="newsletter">I'd like to receive the newsletter</label>
        </div>
        <div class="text-center mt-3">
            <button id="quotesubmit" type="submit" class="btn border-dark btn-info text-white">Get a quote</button>
        </div>
    </div>
</div>