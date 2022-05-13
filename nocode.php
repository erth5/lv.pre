        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public'); 
        $requestData["photo"] = '/storage/'.$path;
        Employee::create($requestData);
        return redirect('employee')->with('flash_message', 'Employee Addedd!');