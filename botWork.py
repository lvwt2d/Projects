from bottle import route, request, post, run
import os, httplib, urllib, hashlib, sys
import sqlite3 as lite

'''
        READ ME
chosen file must be in my phython script's directory
must choose a txt file
websites like facebook wont give you a 200 response status. but websites like umsl.com and w3schools.com will

'''

@route('/upload')
@post('/upload') # or @route('/upload', method='POST')
def upload():
    uploads = request.files.get('thefile')
    site = request.forms.get('site')
    name, ext = os.path.splitext(uploads.filename)
    #abpath = os.path.abspath(uploads.filename)
    if ext not in ('.txt'):
        return 'File extension not allowed.'
    if len(site) == 0:
        return 'Give a website to post to'
    with open (uploads.filename, mode='r', buffering=-1) as in_f, open ('codepainters/uploaded.txt', mode='w', buffering=-1) as out_f:
        
        out_f.write(in_f.read())
        mhash = hashlib.md5(in_f.read()).hexdigest()

    params = urllib.urlencode({'@filehash': mhash})
    headers = {"Content-type": "application/x-www-form-urlencoded",
            "Accept": "text/plain"}
    conn = httplib.HTTPConnection(site)
    conn.request("POST", "", params, headers)
    response = conn.getresponse()
    conn.close()
    print response.status, response.reason
    
    con = None

    try:
        con = lite.connect('test.db')
    
        c = con.cursor()

        #c.execute("DROP TABLE IF EXISTS hashes")
        # Create table
        #c.execute('''CREATE TABLE hashes
         #   (filename text)''')
        
        # Insert a row of data
        c.execute("INSERT INTO hashes VALUES (?)", (site,))

        # Save (commit) the changes
        con.commit()

        
        con.close()                
    
    except lite.Error, e:
    
        print "Error %s:" % e.args[0]
        sys.exit(1)
    
    finally:
    
        if con:
            con.close()
    
    return 'File uploaded. Check out /codepainters/uploaded.txt!'

run(host='localhost', port=8080, debug=True)
