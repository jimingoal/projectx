import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:simple_flutter/env.sample.dart';
import 'package:simple_flutter/models/student.dart';
import 'package:simple_flutter/screens/edit.dart';

class Details extends StatefulWidget {
  final Student student;

  Details({Key? key, required this.student}) : super(key: key);

  @override
  _DetailsState createState() => _DetailsState();
}

class _DetailsState extends State<Details> {
  void deleteStudent(context) async {
    await http.post(
      Uri.parse("${Env.URL_PREFIX}/delte.php"),
      body: {
        'id': widget.student.id.toString(),
      },
    );

    Navigator.of(context).pushNamedAndRemoveUntil('/', (route) => false);
  }

  void confirmDelete(context) => showDialog(
        context: context,
        builder: (BuildContext context) => AlertDialog(
          content: Text('Are you sure you want to delete this?'),
          actions: <Widget>[
            ElevatedButton(
              onPressed: () => Navigator.of(context).pop(),
              child: Text('Cancel'),
              style: ButtonStyle(
                backgroundColor: MaterialStateProperty.all<Color>(Colors.white),
              ),
            ),
            ElevatedButton(
              onPressed: () => deleteStudent(context),
              child: Text('Yes'),
              style: ButtonStyle(
                backgroundColor: MaterialStateProperty.all<Color>(Colors.blue),
              ),
            )
          ],
        ),
      );

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Details'),
        actions: <Widget>[
          IconButton(
            onPressed: () => confirmDelete(context),
            icon: Icon(Icons.delete),
          )
        ],
      ),
      body: Container(
        height: 270.0,
        padding: const EdgeInsets.all(35),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            Text(
              'Name : ${widget.student.name}',
              style: TextStyle(fontSize: 20),
            ),
            Padding(
              padding: EdgeInsets.all(10),
            ),
            Text(
              "Age : ${widget.student.age}",
              style: TextStyle(fontSize: 20),
            )
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        child: Icon(Icons.edit),
        onPressed: () => Navigator.of(context).push(
          MaterialPageRoute(
            builder: (BuildContext context) => Edit(student: widget.student),
          ),
        ),
      ),
    );
  }
}
