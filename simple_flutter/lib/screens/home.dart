import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

import '../env.sample.dart';
import '../models/student.dart';
import './details.dart';
import './create.dart';

class Home extends StatefulWidget {
  const Home({Key? key}) : super(key: key);

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  late Future<List<Student>> students;
  final studentListKey = GlobalKey<_HomeState>();

  @override
  void initState() {
    super.initState();
    students = getStudentsList();
  }

  Future<List<Student>> getStudentsList() async {
    var url = Uri.parse("${Env.URL_PREFIX}/list.php");
    final response = await http.get(url);
    return json
        .decode(response.body)
        .cast<Map<String, dynamic>>()
        .map<Student>((json) => Student.fromJson(json))
        .toList();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      key: studentListKey,
      appBar: AppBar(title: Text('Student List')),
      body: Center(
        child: FutureBuilder<List<Student>>(
          future: students,
          builder: (BuildContext context, AsyncSnapshot snapshot) {
            // By default, show a loading spinner.
            if (!snapshot.hasData) return CircularProgressIndicator();

            // Render student lists
            return ListView.builder(
              itemCount: snapshot.data.length,
              itemBuilder: (BuildContext context, int index) {
                var data = snapshot.data[index];
                return Card(
                  child: ListTile(
                    leading: Icon(Icons.person),
                    trailing: Icon(Icons.view_list),
                    title: Text(
                      data.name,
                      style: TextStyle(fontSize: 20),
                    ),
                    onTap: () => Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) => Details(student: data),
                      ),
                    ),
                  ),
                );
              },
            );
          },
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () => Navigator.push(
          context,
          MaterialPageRoute(builder: (_) => Create()),
        ),
      ),
    );
  }
}
