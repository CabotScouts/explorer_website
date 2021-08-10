<html>
  <head>
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700;900&display=swap" rel="stylesheet">
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
        overscroll-behavior: none;
        background: #003982;
        font-family: 'Nunito Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 18px;
        color: #ffffff;
      }
      
      body, .container {
        height: 100%;
      }

      .container {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .message {
        max-width: 800px;
        padding: 15px;
        text-align: center;
      }

      .message pre {
        font-size: 0.6rem;
        line-height: 0.8rem;
        font-weight: 900;
        margin-bottom: 15px;
      }
      
      .message h1 {
        font-weight: 900;
        font-size: 3rem;
        margin: 0;
      }

      .message p {
        font-weight: 700;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="message">
<pre>
                              @                              
                            @@@@@                            
                         @@@@@ @@@@@                         
                       @@@@       @@@@                       
                     @@@@           @@@@                     
                    @@@               @@@                    
                    @@@               @@@                    
        @@@@        @@@               @@@        @@@@        
   @@@@@@@@@@@@@    @@@               @@@    @@@@@@@@@@@@@   
 @@@@         @@@@   @@@             @@@   @@@@         @@@@ 
@@@            @@@@   @@@           @@@   @@@@            @@@
@@@              @@@   @@@         @@@   @@@              @@@
                  @@@   @@@       @@@   @@@                  

             @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@             
             @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@             

                        @@@       @@@                       
                      @@@@         @@@@                     
                       @@@         @@@                      
                        @@@@     @@@@                       
                          @@@@@@@@@                         
</pre>
        <h1>{{ config('app.name') }}</h1>
        <p>Sorry, the website is currently down for scheduled maintenance. We'll be back soon!</p>
      </div>
    </div>
  </body>
</html>
